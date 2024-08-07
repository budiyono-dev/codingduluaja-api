//<?php.

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::MENU_ACCESS, function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->unique();
            $table->string('description', 1000);
            $table->timestamps();
        });

        Schema::create(TableName::MENU_ACCESS_DETAIL, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_access_id');
            $table->unsignedBiginteger('menu_item_id');
            $table->boolean('enabled')->default(false);
            $table->timestamps();

            $table->foreign('menu_access_id')->references('id')->on(TableName::MENU_ACCESS);
        });

        Schema::create(TableName::USER_MENU_ACCESS, function (Blueprint $table) {
            $table->id();
            $table->string('role_code');
            $table->unsignedBigInteger('menu_access_id');
            $table->timestamps();

            $table->foreign('role_code')->references('code')->on(TableName::USER_ROLE);
            $table->foreign('menu_access_id')->references('id')->on(TableName::MENU_ACCESS);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::MENU_ACCESS);
        Schema::dropIfExists(TableName::MENU_ACCESS_DETAIL);
        Schema::dropIfExists(TableName::USER_MENU_ACCESS);
    }
};
