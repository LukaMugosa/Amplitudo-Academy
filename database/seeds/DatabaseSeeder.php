<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ProfilesSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(AbilitiesTableSeeder::class);
        $this->call(AbilityRoleTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CourseUserTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ProjectUserTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(AssignmentsTableSeeder::class);
        $this->call(AssignmentUserTableSeeder::class);
        $this->call(CommentPostTableSeeder::class);
        $this->call(UpdateUsersSeeder::class);
    }
}
