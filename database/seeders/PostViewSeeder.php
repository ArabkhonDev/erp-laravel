<?php
use Illuminate\Database\Seeder;
use App\Models\PostView;
use App\Models\Post;
use App\Models\Teacher;
use App\Models\Student;
use Carbon\Carbon;

class PostViewSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();
        $teachers = Teacher::all();
        $students = Student::all();

        foreach ($posts as $post) {
            // Random 5 ta teacher va 10 ta student ko‘rgan deb qo‘shamiz
            foreach ($teachers->random(5) as $teacher) {
                PostView::create([
                    'post_id' => $post->id,
                    'viewer_id' => $teacher->id,
                    'viewer_type' => 'teacher',
                    'viewed_at' => Carbon::today()->subDays(rand(0, 30))->toDateString(),
                    'view_count' => rand(1, 5),
                ]);
            }

            foreach ($students->random(10) as $student) {
                PostView::create([
                    'post_id' => $post->id,
                    'viewer_id' => $student->id,
                    'viewer_type' => 'student',
                    'viewed_at' => Carbon::today()->subDays(rand(0, 30))->toDateString(),
                    'view_count' => rand(1, 10),
                ]);
            }
        }
    }
}
