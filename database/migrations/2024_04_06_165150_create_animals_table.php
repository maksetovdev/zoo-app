<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Region;
use App\Models\Location;
use App\Models\Img;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users');
            $table->string('name');
            $table->foreignIdFor(Region::class)->constrained('regions');
            $table->integer('price');
            $table->longText('description');
            $table->foreignIdFor(Location::class)->constrained('locations');
            $table->foreignIdFor(Img::class)->constrained('imgs');
            $table->foreignIdFor(Category::class)->constrained('categories');
            $table->bigInteger('like');
            $table->bigInteger('quantity');
            $table->boolean('is_checked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
