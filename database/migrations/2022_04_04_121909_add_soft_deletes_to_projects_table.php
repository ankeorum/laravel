



            $table->dropColumn('deleted_at');
            $table->softDeletes();
        Schema::table('projects', function (Blueprint $table) {
        Schema::table('projects', function (Blueprint $table) {
        });
        });
     *
     *
     * @return void
     * @return void
     * Reverse the migrations.
     * Run the migrations.
     */
     */
    /**
    /**
    public function down()
    public function up()
    {
    {
    }
    }
<?php
class AddSoftDeletesToProjectsTable extends Migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
{
}