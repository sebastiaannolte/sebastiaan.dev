<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title'     => 'Another test page',
            'github_link'    => 'test-page',
            'content' => 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoMjU1LCAyNTUsIDI1NSk7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgaGVsdmV0aWNhLCBhcmlhbCwgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDQyLCA0MiwgNDIpOyI+VmlldyBbYWJvdXRdIG5vdCBmb3VuZDwvc3Bhbj48L3A+',
            'blog_post_id' => '1',
            'image' => 'https://github.blog/wp-content/uploads/2019/05/facebook-1200x630.png?fit=1203%2C633',
            'created_at' => date('Y-m-d H:i:s'),

        ]);
    }
}
