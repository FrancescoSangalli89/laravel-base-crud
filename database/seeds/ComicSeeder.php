<?php

use App\Comic;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comicsList = config('comics');

        foreach($comicsList as $comic) {
            $newComic = new Comic();

            $newComic->fill($comic);
            $newComic->save();

        }
    }
}
