<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ABCICOSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['type' => 'history', 'title' => 'Historia', 'content' => "La Asociación Boliviana de Cirugía de Columna (ABCICO) fue fundada con el propósito de reunir a los profesionales especializados en el tratamiento de patologías de la columna vertebral. Desde nuestros inicios, nos hemos comprometido con la excelencia médica, la investigación y la formación continua de nuestros asociados.\n\nA lo largo de los años, ABCICO ha crecido significativamente, consolidándose como un referente en el ámbito de la cirugía de columna en Bolivia y la región. Nuestra trayectoria está marcada por el compromiso con la calidad y la innovación en procedimientos quirúrgicos.\n\nHoy, ABCICO sigue fortaleciendo su legado, promoviendo el desarrollo científico y la práctica médica ética para mejorar la calidad de vida de nuestros pacientes."],
            ['type' => 'who_we_are', 'title' => 'Quiénes Somos', 'content' => "Somos un grupo de profesionales de la salud dedicados exclusivamente a la cirugía de columna vertebral. Nuestro equipo está compuesto por cirujanos ortopédicos y neurocirujanos con amplia experiencia y formación especializada.\n\nNuestra misión es proporcionar atención médica de alta calidad a pacientes con condiciones de la columna vertebral, utilizando las técnicas más avanzadas y evidencia científica actual.\n\nValoramos la integridad, la honestidad profesional, la empatía con nuestros pacientes y el trabajo en equipo para alcanzar los mejores resultados posibles."],
            ['type' => 'mission', 'title' => 'Misión', 'content' => "Nuestra misión es promover el desarrollo y la excelencia en la cirugía de columna vertebral en Bolivia, a través de la formación continua, la investigación científica, la difusión de conocimientos y la provisión de atención médica especializada de alta calidad.\n\nBuscamos mejorar la calidad de vida de nuestros pacientes ofreciendo soluciones quirúrgicas innovadoras y basadas en evidencia, así como contribuir al avance de la ciencia médica en nuestra especialidad."],
            ['type' => 'vision', 'title' => 'Visión', 'content' => "Ser la asociación de referencia en cirugía de columna en América Latina, reconocida por la excelencia académica, la innovación en procedimientos quirúrgicos y el compromiso con el bienestar de nuestros pacientes.\n\nVislumbramos un futuro donde ABCICO lidera la adopción de tecnologías de vanguardia en el tratamiento de patologías vertebrales, formando a las próximas generaciones de especialistas y estableciendo estándares internacionales de calidad."],
            ['type' => 'objectives', 'title' => 'Objetivos', 'content' => "• Fomentar el desarrollo profesional y científico de los cirujanos de columna en Bolivia.\n• Promover la investigación y la publicación de estudios relacionados con la cirugía de columna.\n• Organizar congresos, cursos y seminarios para la formación continua de nuestros asociados.\n• Establecer estándares éticos y de calidad en la práctica de la cirugía de columna.\n• Brindar asesoría y apoyo a pacientes que requieren tratamiento quirúrgico especializado.\n• Fortalecer las relaciones con organizaciones internacionales de cirugía de columna.\n• Contribuir al desarrollo de políticas de salud que beneficien el tratamiento de patologías vertebrales."],
            ['type' => 'board', 'title' => 'Junta Directiva 2025-2027', 'content' => "La Junta Directiva de ABCICO para el período 2025-2027 está compuesta por profesionales comprometidos con el desarrollo de la asociación y la especialidad de cirugía de columna. Nuestro equipo directivo trabaja coordinadamente para cumplir con los objetivos institucionales y mantener el crecimiento sostenido de nuestra organización.\n\nLa directiva se renueva cada dos años mediante votación de los asociados activos, garantizando la participación democrática y la renovación de ideas."],
        ];

        foreach ($sections as $s) {
            DB::table('section_contents')->insert([
                'type' => $s['type'], 'title' => $s['title'], 'content' => $s['content'],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $statutes = [
            ['title' => 'Denominación', 'slug' => 'denominacion', 'content' => "La Asociación Boliviana de Cirugía de Columna, en adelante ABCICO, es una asociación civil sin fines de lucro, constituida conforme a las leyes bolivianas vigentes. Su domicilio legal estará sujeto a las disposiciones del Código Civil y las normativas vigentes para asociaciones.\n\nABCICO se rige por sus presentes Estatutos y por las disposiciones legales que resulten aplicables a su naturaleza jurídica."],
            ['title' => 'Objeto', 'slug' => 'objeto', 'content' => "El objeto de ABCICO es el desarrollo y promoción de la especialidad de cirugía de columna en Bolivia. En particular, la asociación se propone:\n\na) Agrupar a los profesionales de la salud dedicados a la cirugía de columna.\nb) Promover el desarrollo científico y técnico en el ámbito de la cirugía vertebral.\nc) Brindar servicios de asesoría y capacitación a sus asociados.\nd) Organizar eventos científicos, congresos y cursos de formación continua.\ne) Establecer estándares de calidad y ética profesional.\nf) Representar a sus asociados ante instituciones públicas y privadas.\ng) Fomentar la colaboración con asociaciones internacionales de la especialidad."],
            ['title' => 'Categoría de Miembros', 'slug' => 'member_categories', 'content' => "Las categorías de miembros de ABCICO son las siguientes:\n\n1. Miembros Fundadores: Aquellos que participaron en la fundación de la asociación. Gozan de los derechos plenos y tienen voz y voto en las asambleas.\n\n2. Miembros Regulares: Profesionales de la salud que cumplen con los requisitos de ingreso establecidos por la Directiva. Poseen derecho a voz y voto.\n\n3. Miembros Honorarios: Profesionales o personalidades destacadas que, por sus méritos excepcionales, son distinguidas por la Asamblea General. Gozan de los mismos derechos que los miembros regulares.\n\n4. Miembros Adherentes: Profesionales interesados en la especialidad que desean participar en las actividades de la asociación sin derecho a voto.\n\nTodos los miembros deben cumplir con los requisitos establecidos en estos Estatutos y abonar las cuotas correspondientes."],
            ['title' => 'Directiva', 'slug' => 'directiva', 'content' => "La Directiva de ABCICO es el órgano de gobierno encargado de la administración y representación de la asociación. Estará compuesta por:\n\n- Presidente/a: Representa legalmente a la asociación y preside las sesiones.\n- Vicepresidente/a: Sustituye al Presidente en sus ausencias y coordina las comisiones.\n- Secretario/a: Custodia el libro de actas y documentación oficial.\n- Tesorero/a: Administra los recursos económicos de la asociación.\n- Vocales: Apoyan las funciones ejecutivas y representan a los asociados.\n\nLa Directiva será elegida por la Asamblea General para un período de dos años, pudiendo ser reelecta. El período 2025-2027 es el actual.\n\nLa Directiva se reunirá de forma ordinaria mensualmente y extraordinaria cuando sea convocada por el Presidente o a solicitud de al menos la mitad de los miembros."],
        ];

        foreach ($statutes as $s) {
            DB::table('statute_items')->insert([
                'title' => $s['title'], 'slug' => $s['slug'], 'content' => $s['content'],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $userIds = [];
        $usersData = [
            ['name' => 'Dr. Carlos Gutiérrez', 'email' => 'carlos.gutierrez@abcico.org'],
            ['name' => 'Dra. María López', 'email' => 'maria.lopez@abcico.org'],
            ['name' => 'Dr. Juan Pérez', 'email' => 'juan.perez@abcico.org'],
        ];

        foreach ($usersData as $u) {
            DB::table('users')->insert([
                'name' => $u['name'], 'email' => $u['email'],
                'password' => Hash::make('password123'),
                'role' => 'founder',
                'created_at' => now(), 'updated_at' => now(),
            ]);
            $userIds[] = DB::getPdo()->lastInsertId();
        }

        $boardMembers = [
            ['name' => 'Dr. Carlos Gutiérrez', 'position' => 'Presidente', 'description' => 'Especialista en cirugía vertebral con más de 20 años de experiencia.', 'start_date' => '2025-01-01', 'end_date' => null],
            ['name' => 'Dra. María López', 'position' => 'Vicepresidenta', 'description' => 'Neurocirujana especializada en patologías del segmento cervical.', 'start_date' => '2025-01-01', 'end_date' => null],
            ['name' => 'Dr. Juan Pérez', 'position' => 'Secretario', 'description' => 'Cirujano ortopédico con enfoque en técnicas mínimamente invasivas.', 'start_date' => '2025-01-01', 'end_date' => null],
            ['name' => 'Dra. Ana Ramírez', 'position' => 'Tesorera', 'description' => 'Administradora de salud con experiencia en gestión de organizaciones médicas.', 'start_date' => '2025-01-01', 'end_date' => null],
            ['name' => 'Dr. Pedro Sánchez', 'position' => 'Vocal', 'description' => 'Especialista en reconstrucción de columna y fracturas vertebrales.', 'start_date' => '2025-01-01', 'end_date' => null],
            ['name' => 'Dra. Laura Fernández', 'position' => 'Vocal', 'description' => 'Fisiatra con amplia experiencia en rehabilitación de columna.', 'start_date' => '2025-01-01', 'end_date' => null],
        ];

        foreach ($boardMembers as $bm) {
            DB::table('board_members')->insert([
                'name' => $bm['name'], 'position' => $bm['position'],
                'description' => $bm['description'] ?? null,
                'start_date' => $bm['start_date'], 'end_date' => $bm['end_date'] ?? null,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $founders = [
            ['name' => 'Dr. Carlos Gutiérrez', 'role' => 'Fundador Principal', 'description' => 'Pionero en la fundación de ABCICO y referente en cirugía de columna.', 'user_id' => $userIds[0]],
            ['name' => 'Dra. María López', 'role' => 'Co-Fundadora', 'description' => 'Especialista en neurocirugía vertebral, cofundadora de la asociación.', 'user_id' => $userIds[1]],
            ['name' => 'Dr. Juan Pérez', 'role' => 'Fundador', 'description' => 'Cirujano ortopédico, fundador y miembro histórico de ABCICO.', 'user_id' => $userIds[2]],
        ];

        foreach ($founders as $f) {
            DB::table('founders')->insert([
                'name' => $f['name'], 'role' => $f['role'], 'description' => $f['description'] ?? null,
                'user_id' => $f['user_id'], 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Dr. Roberto Villarroel', 'email' => 'roberto.villarroel@abcico.org',
            'password' => Hash::make('password123'), 'role' => 'member',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $regularUserId = DB::getPdo()->lastInsertId();
        DB::table('members')->insert([
            'user_id' => $regularUserId, 'membership_type' => 'regular', 'status' => 'active',
            'joined_at' => now(), 'created_at' => now(), 'updated_at' => now(),
        ]);
    }
}
