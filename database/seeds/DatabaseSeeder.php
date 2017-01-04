<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {
          $this->call('RolesTableSeeder');
      }
}

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        for($i=0; $i<4; $i++) {
            App\Comment::create(array(
                'body'=>"This is comment ".$i,
                'article_id'=> 1
            ));
        }

        for($i=0; $i<6; $i++) {
            App\Comment::create(array(
                'body'=>"This is comment ".$i,
                'article_id'=> 2
            ));
        }

    }
}

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        App\Article::create(array(
            'title'=>"How to ride a bike ",
            'body'=> "body bike "
        ));

        App\Article::create(array(
            'title'=>"peel potato 4 beginners ",
            'body'=> "body potato "
        ));
    }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
    //    DB::table('roles')->create(array(
    //        'slug'=>"admin",
    //        'name'=> "Admin"
    //    ));

        //DB::insert( insert into roles ('slug', 'name') values ('admin', 'Admin'), ("manager","Manger") );
        DB::insert('insert into roles (slug, name) values (?, ?)', ['admin', 'Admin']);
        DB::insert('insert into roles (slug, name) values (?, ?)', ["manager","Manager"]);
    }
}
