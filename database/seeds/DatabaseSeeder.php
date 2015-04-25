<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        //Tablas asociadas a claves foráneas
        $this->call('PaisesSeeder');
        $this->call('ProvinciasSeeder');
        $this->call('LocalidadesSeeder');
        $this->call('CategoriasSeeder');
        $this->call('GruposSeeder');
        $this->call('RolesSeeder');
        //Resto de tablas
        $this->call("UsuariosSeeder");
        $this->call("EmpresasSeeder");
        $this->call("ProyectosSeeder");
        $this->call("ProfesionalesSeeder");
        $this->call("IniciativasSeeder");
        $this->call("PostulacionesSeeder");
        $this->call("GruposProfesionalesSeeder");
        $this->call("CategoriasEmpresasSeeder");
        $this->call("CategoriasProfesionalesSeeder");
	}

}
class PaisesSeeder extends Seeder{
    public function run(){
        DB::table("paises")->delete();
        for ($i = 0; $i < 10; $i += 1) {
            DB::table('paises')->insert(Array('pais' => 'Pais_' . $i));
        }

    }
}
class ProvinciasSeeder extends Seeder{
    public function run(){
        DB::table("provincias")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('provincias')->insert(Array('provincia' => 'Provincia_' . $i));
        }

    }
}


class LocalidadesSeeder extends Seeder{
    public function run(){
        DB::table("localidades")->delete();
        for ($i = 0; $i < 30; $i += 1) {
            DB::table('localidades')->insert(Array('localidad' => 'Localidad_' . $i));
        }

    }
}


class CategoriasSeeder extends Seeder{
    public function run(){
        DB::table("categorias")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('categorias')->insert(Array('categoria' => 'Categoria_'. $i));
        }

    }
}
class GruposSeeder extends Seeder{
    public function run(){
        DB::table("grupos")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('grupos')->insert(Array('grupo' => 'Grupo_' . $i,'activo'=>rand(0,1)));
        }

    }
}
class RolesSeeder extends Seeder{
    public function run(){
        DB::table("roles")->delete();
        $a=array('visitante','registrado','autorizado','administrador');
        for ($i = 0; $i < count($a); $i += 1) {
            DB::table('roles')->insert(Array('rol' => $a[$i],'peso'=>$i*100));
        }

    }
}
class UsuariosSeeder extends Seeder{
    public function run(){
        DB::table("users")->delete();
        for ($i = 0; $i < 10; $i += 1) {
            DB::table('users')->insert(Array('usuario' => 'user_'.$i,'rol_id'=>rand(1,4),'password'=>'pass_'.$i,'email'=>'emailUser_'.$i.'@yahoo.es','activo'=>rand(0,1)));
        }

    }
}

class EmpresasSeeder extends Seeder{
    public function run(){
        DB::table("empresas")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('empresas')->insert(Array('usuario_id'=>rand(1,10),'cif' => 'A' . rand(11111111,99999999),'nombre'=>'Nombre_'.$i,
                'responsable'=>'Responsable_'.$i,'contacto'=>"Contacto_".$i,'pais_id'=>rand(1,10),'provincia_id'=>rand(1,20),
                'localidad_id'=>rand(1,30),'direccion'=>'Direccion_'.$i,'cp'=>rand(11111,99999),'telefono'=>'+34928'.rand(111111,999999),
                'movil'=>'+34676'.rand(111111,999999),'fax'=>'+34555'.rand(111111,999999),'email'=>'email_'.$i.'@.com',
                'web'=>'http://fmentado.esy.es/'.$i,'anio_constitucion'=>'2014','num_trabajadores'=>rand(2,90),
                'sector_id'=>rand(1,10),'servicio_id'=>rand(1,10)));
        }

    }
}
class ProyectosSeeder extends Seeder{
    public function run(){
        DB::table("proyectos")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('proyectos')->insert(Array('empresa_id'=>rand(1,20),'titulo' => 'Titulo_' . $i,'objetivo'=>'Objetivos_'.$i,
                'fecha_inicio'=>date("Y-m-d H:i:s"),'fecha_final'=>date("Y-m-d H:i:s"),'estado'=>rand(0,1),'activo'=>rand(0,1)));
        }

    }
}
class ProfesionalesSeeder extends Seeder{
    public function run(){
        DB::table("profesionales")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('profesionales')->insert(Array('usuario_id'=>rand(1,10),'nif_cif' =>rand(11111111,99999999).'M','nombre'=>'Nombre_'.$i,
                'apellido_1'=>'Apellido_1_'.$i,'apellido_2'=>"Apellido_2_".$i,'pais_id'=>rand(1,10),'provincia_id'=>rand(1,20),
                'localidad_id'=>rand(1,30),'direccion'=>'Direccion_'.$i,'cp'=>rand(11111,99999),'telefono'=>'+34928'.rand(111111,999999),
                'movil'=>'+34676'.rand(111111,999999),'fax'=>'+34555'.rand(111111,999999),'fecha_nacimiento'=>date("Y-m-d H:i:s"),
                'web'=>'http://fmentado.esy.es/'.$i,'formacion_academica'=>rand(0,1),'formacion_complementaria'=>rand(0,1),
                'habilidades'=>'Habilidades_'.$i,'experiencia_profesional'=>'Experiencia_'.$i,'formador'=>rand(0,1),
                'tutor'=>rand(0,1),'compartir_experiencia'=>rand(0,1),'activo'=>rand(0,1)));
        }

    }
}
class IniciativasSeeder extends Seeder{
    public function run(){
        DB::table("iniciativas")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('iniciativas')->insert(Array('iniciativa'=>'Iniciativa_'.$i,'necesidad_a_resolver'=>'Resuelve_'.$i,
                'solucion'=>'Solución_'.$i,'ambito_geografico'=>'Ambito Geográfico_'.$i,'categoria_id'=>rand(1,20),
                'profesional_id'=>rand(1,20),'activo'=>rand(0,1)));
        }

    }
}
class PostulacionesSeeder extends Seeder{
    public function run(){
        DB::table("postulaciones")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('postulaciones')->insert(Array('proyecto_id'=>rand(1,20),'profesional_id'=>rand(1,20),'iniciativa_id'=>rand(1,20)));
        }

    }
}
class GruposProfesionalesSeeder extends Seeder{
    public function run(){
        DB::table("grupos_profesionales")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('grupos_profesionales')->insert(Array('grupo_id'=>rand(1,20),'profesional_id'=>rand(1,20)));
        }

    }
}
class CategoriasEmpresasSeeder extends Seeder{
    public function run(){
        DB::table("categorias_empresas")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('categorias_empresas')->insert(Array('empresa_id'=>rand(1,20),'categoria_id'=>rand(1,20)));
        }

    }
}
class CategoriasProfesionalesSeeder extends Seeder{
    public function run(){
        DB::table("categorias_profesionales")->delete();
        for ($i = 0; $i < 20; $i += 1) {
            DB::table('categorias_profesionales')->insert(Array('profesional_id'=>rand(1,20),'categoria_id'=>rand(1,20)));
        }

    }
}
