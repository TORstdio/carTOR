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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('model');
            $table->string('kms')->nullable();
            $table->year('year')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->boolean('avilable')->default(true)->nullable();
            $table->enum('status', ['nuevo', 'usado'])->nullable();

            //foreaneas
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('vehicle_brands')->onDelete('set null');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('set null');

            //exterior
            $table->integer('doors')->nullable();
            $table->integer('rim_size')->nullable();
            $table->string('rim_material')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('tire_lifetime')->nullable();
            $table->enum('trunk_opening', ['remoto', 'manual'])->nullable();

            //interior
            $table->enum('air_conditioning', ['niveles', 'temperatura', 'no'])->nullable();
            $table->enum('seating_materials', ['cuero', 'tela', 'vinilo', 'alcántara', 'sintético'])->nullable();
            $table->boolean('seat_air_conditioning')->nullable();
            $table->string('seating_color')->nullable();

            //seguridad
            $table->enum('brakes_type', ['abs', 'disco', 'combinado'])->nullable();
            $table->boolean('airbag')->nullable();

            //mecanico
            $table->enum('fuel_type', ['gasolina', 'diesel', 'electrico', 'hibrido', 'gas'])->nullable();
            $table->string('gas_consumption')->nullable();
            $table->string('traction')->nullable();
            $table->enum('transmission', ['automatico', 'manual'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
