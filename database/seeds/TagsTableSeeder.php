<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['cinema', 'sport', 'tempo libero', 'libri', 'fai da te', 'cucina'];

        // Cancella tutte le righe della tabella e resetta anche l'indice autoincrement.
        Tag::truncate();
    
        foreach ($tags as $tag) {
          $newTag = new Tag();
          $newTag->name = $tag;
          $newTag->save();
        }
    }
}
