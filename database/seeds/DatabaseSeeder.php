 <?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\Category;
use App\Comment;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $bob = new User;
        $bob->name = "Bob";
        $bob->email = "bob@gmail.com";
        $bob->password = bcrypt("123456");
        $bob->save();

        $alice = new User;
        $alice->name = "Alice";
        $alice->email = "alice@gmail.com";
        $alice->password = bcrypt("123456");
        $alice->save();

    	for($i=0; $i<20; $i++) {
    		$post = new Post;
    		$post->title = $faker->sentence;
    		$post->body = $faker->paragraph;
    		$post->category_id = rand(1, 5);
            $post->user_id = rand(1, 2);
    		$post->save();
    	}

        $list = ['General', 'Technology', 'Computer', 'Internet', 'Mobile'];
        foreach($list as $name) {
            $category = new Category;
            $category->name = $name;
            $category->save();
        }

        for($i=0; $i<20; $i++) {
            $comment = new Comment;
            $comment->comment = $faker->paragraph;
            $comment->post_id = rand(10, 20);
            $comment->user_id = rand(1, 2);
            $comment->save();
        }

        // $this->call(UsersTableSeeder::class);
    }
}
