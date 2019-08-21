<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->insert([
            'title'     => 'This is a test page',
            'permalink'    => 'nice-page',
            'content' => 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgaGVsdmV0aWNhLCBhcmlhbCwgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDQyLCA0MiwgNDIpOyI+VmlldyBbYWJvdXRdIG5vdCBmb3VuZDwvc3Bhbj48L3A+',
            'created_at' => date('Y-m-d H:i:s'),

        ]);

        DB::table('blog_posts')->insert([
            'title'     => 'Another test page',
            'permalink'    => 'test-page',
            'content' => 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgaGVsdmV0aWNhLCBhcmlhbCwgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDQyLCA0MiwgNDIpOyI+VmlldyBbYWJvdXRdIG5vdCBmb3VuZDwvc3Bhbj48L3A+',
            'created_at' => date('Y-m-d H:i:s'),

        ]);
    }
}
