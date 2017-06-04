<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos= array("nombre" => 
                            array (
                                "Taller de Lenguaje y Comunicación",
                                "Taller de Arte o Deporte",
                                "Biología Humana",
                                "Química Orgánica e Inorgánica",
                                "Matemática y Lógica",
                                "Anatomía Humana I",
                                "Defensa Nacional",
                                "Metodología del Trabajo Universitario",

                                "Educación y Comunicación en Salud",
                                "Anatomía Humana II",
                                "Microbiología y Parasitología Humana",
                                "Bioquímica",
                                "Bioestadística",
                                "Antropología Social en Salud",
                                "Ecología",

                                "Introducción a  la Enfermería",
                                "Semiología",
                                "Fisiología Humana I",
                                "Psicología",
                                "Enfermería en Salud Comunitaria I",
                                "Farmacología",

                                "Crecimiento y Desarrollo del Niño",
                                "Filosofía",
                                "Metodología de la Investigación",
                                "Fisiología Humana II",
                                "Enfermería Básica y Aplicación de Tecnologías I",
                                "Enfermería en Salud Comunitaria II",

                                "Nutrición y Dietética",
                                "Enfermería Básica y Aplicación de Tecnologías II",
                                "Patología Médica",
                                "Enfermería en Emergencia y Desastres",
                                "Enfermería en Salud de la Mujer",
                                "Ética, Bioética y Deontología en Enfermería",

                                "Economía en Salud",
                                "Enfermería en Atención del Adulto y Adulto Mayor I",
                                "Epidemiología",
                                "Patología Quirúrgica",
                                "Gestión de los servicios Hospitalarios y Comunitarios I",

                                "Enfermería en Atención del Adulto y Adulto Mayor II",
                                "Enfermería en Neonatología",
                                "Enfermería en Salud Ocupacional.",
                                "Enfermería en Atención del Niño y del Adolescente I.",
                                "Investigación en Enfermería I",

                                "Enfermería en Atención del Niño y del Adolescente II.",
                                "Enfermería en Atención del Adulto y Adulto Mayor III",
                                "Estrategias Sanitarias en Salud",
                                "Investigación en Enfermería II",
                                "Cirugía Menor e Instrumentación",

                                "Enfermería en Salud Mental y Psiquiátrica",
                                "Gestión de los Servicios Hospitalarios y Comunitarios II",
                                "Enfermería en Cuidados Intensivos",
                                "Proyectos de Desarrollo (Social)",
                                "Medicina Alternativa",

                                "Internado y Externado en Enfermería"),

                 "cod" =>
                            array (
                                "1101",
                                "1102",
                                "1103",
                                "1104",
                                "1105",
                                "1106",
                                "1107",
                                "1108",

                                "1201",
                                "1202",
                                "1203",
                                "1204",
                                "1205",
                                "1206",
                                "1207",

                                "2101",
                                "2102",
                                "2103",
                                "2104",
                                "2105",
                                "2106",

                                "2201",
                                "2202",
                                "2203",
                                "2204",
                                "2205",
                                "2206",

                                "3101",
                                "3102",
                                "3103",
                                "3104",
                                "3105",
                                "3106",

                                "3201",
                                "3202",
                                "3203",
                                "3204",
                                "3205",

                                "4101",
                                "4102",
                                "4103",
                                "4104",
                                "4105",

                                "4201",
                                "4202",
                                "4203",
                                "4204",
                                "4205",

                                "5101",
                                "5102",
                                "5103",
                                "5104",
                                "5105",

                                "5201"),
                "sem" =>
                            array (
                                "I",
                                "I",
                                "I",
                                "I",
                                "I",
                                "I",
                                "I",
                                "I",

                                "II",
                                "II",
                                "II",
                                "II",
                                "II",
                                "II",
                                "II",

                                "III",
                                "III",
                                "III",
                                "III",
                                "III",
                                "III",

                                "IV",
                                "IV",
                                "IV",
                                "IV",
                                "IV",
                                "IV",

                                "V",
                                "V",
                                "V",
                                "V",
                                "V",
                                "V",

                                "VI",
                                "VI",
                                "VI",
                                "VI",
                                "VI",

                                "VII",
                                "VII",
                                "VII",
                                "VII",
                                "VII",

                                "VIII",
                                "VIII",
                                "VIII",
                                "VIII",
                                "VIII",

                                "IX",
                                "IX",
                                "IX",
                                "IX",
                                "IX",

                                "X")

 );

    	for ($i=0; $i<54; $i++) { 
    		DB::table('cursos')->insert([
                'curso' => $cursos["nombre"][$i],
                'cod' => $cursos["cod"][$i],
                'semestre' => $cursos["sem"][$i],
             ]);
    	}
    }
}
