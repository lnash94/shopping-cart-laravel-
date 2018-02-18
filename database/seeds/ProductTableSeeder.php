<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath'=>'http://cdn.newsapi.com.au/image/v1/bf2f4925a08af3efa31129e1969a2675?width=316',
            'title'=>'Harry Potter',
            'description'=>'Harry Potter is a series of fantasy novels written by British author J. K. Rowling. The novels chronicle the life of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harry\'s struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic, and subjugate all wizards and muggles, a reference term that means non-magical people.',
            'price'=>12
        ]);

        $product->save();

        $product = new \App\Product([
            'imagePath'=>'http://cdn.newsapi.com.au/image/v1/bf2f4925a08af3efa31129e1969a2675?width=316',
            'title'=>'Harry Potter',
            'description'=>'Harry Potter is a series of fantasy novels written by British author J. K. Rowling. The novels chronicle the life of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harry\'s struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic, and subjugate all wizards and muggles, a reference term that means non-magical people.',
            'price'=>12
        ]);

        $product->save();


        $product = new \App\Product([
            'imagePath'=>'http://cdn.newsapi.com.au/image/v1/bf2f4925a08af3efa31129e1969a2675?width=316',
            'title'=>'Harry Potter',
            'description'=>'Harry Potter is a series of fantasy novels written by British author J. K. Rowling. The novels chronicle the life of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harry\'s struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic, and subjugate all wizards and muggles, a reference term that means non-magical people.',
            'price'=>12
        ]);

        $product->save();
    }
}
