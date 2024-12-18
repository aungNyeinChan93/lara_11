<?php

use App\Models\Type;
use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('type')->default('normal');
            $table->timestamps();
        });

        Schema::create('customer_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class,'customer_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Type::class,'type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_type');
    }
};
