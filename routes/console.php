<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Hash existing plain-text user passwords in the 'usuario' table
Artisan::command('hash:usuarios-passwords {--dry}', function () {
    $dryRun = (bool) $this->option('dry');

    $total = 0;
    $skipped = 0;
    $updated = 0;

    // Stream rows to avoid memory issues and not depend on a specific primary key name
    foreach (Usuario::query()->select(['email', 'password'])->cursor() as $u) {
        $total++;

        $pwd = $u->password;
        if (!$pwd) {
            $skipped++;
            $this->line("[skip] email={$u->email} (sin password)");
            continue;
        }

        // If looks already hashed (bcrypt/argon), skip
        if (preg_match('/^\$(2y|2a|argon2i|argon2id)\$/', (string) $pwd)) {
            $skipped++;
            $this->line("[skip] email={$u->email} (ya encriptada)");
            continue;
        }

        // Otherwise, hash the plain-text (often numérica) password
        $hashed = Hash::make($pwd);

        if ($dryRun) {
            $this->line("[dry]  email={$u->email} -> será encriptada");
        } else {
            // Actualiza por email (asumido único) para evitar dependencia del nombre de PK
            Usuario::where('email', $u->email)->update(['password' => $hashed]);
            $updated++;
            $this->line("[ok]   email={$u->email} encriptada");
        }
    }

    if ($dryRun) {
        $this->info("Dry run completado. Total: {$total}, ya encriptadas/omitidas: {$skipped}, a encriptar: " . ($total - $skipped));
    } else {
        $this->info("Actualización completada. Total: {$total}, omitidas: {$skipped}, encriptadas: {$updated}");
    }
})->purpose('Encripta las contraseñas en texto plano existentes de la tabla usuario');

// Utility: Alter length of usuario.password to store bcrypt hashes
Artisan::command('db:usuarios-password-column:resize {length=255}', function (int $length) {
    try {
        DB::statement("ALTER TABLE usuario ALTER COLUMN password VARCHAR($length)");
        $this->info("Columna 'password' de 'usuario' actualizada a VARCHAR($length)");
    } catch (\Throwable $e) {
        $this->error('Error al alterar la columna: ' . $e->getMessage());
    }
})->purpose("Ajusta la longitud de 'usuario.password' (ej. 255) para almacenar hashes");
