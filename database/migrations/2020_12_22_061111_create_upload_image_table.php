<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUploadImageTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('upload_image', function (Blueprint $table) {
			$table->id();
			$table->string("file_name");
			$table->string("file_path");
			$table->string("file_title");
            $table->string("file_test");
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        //    $table->timestamps();
       });
   }
   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('upload_image');
   }
}
