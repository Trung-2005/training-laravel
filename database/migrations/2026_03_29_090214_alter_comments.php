<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('comments', function (Blueprint $table) {
        //     $table->unsignedInteger('user_id')->after('article_id');
        //     $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        // });

        // Nếu muốn xoá, đổi tên bảng ta cần tạo một migration mới để thực hiện việc đó, không thể sửa trực tiếp trong migration đã chạy rồi
        // Schema::drop('comments'); // xoá bảng comments
        // Schema::rename('comments', 'feedbacks'); // đổi tên bảng comments thành feedbacks   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
