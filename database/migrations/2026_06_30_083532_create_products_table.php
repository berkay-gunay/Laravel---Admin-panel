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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            
            $table->string('urun_adi');
            $table->string('marka');
            $table->decimal('fiyati', 10, 2); 
            $table->string('urun_grubu'); 
            $table->string('cinsiyet')->nullable();
            
            $table->string('cerceve_rengi')->nullable();
            $table->string('cam_rengi')->nullable();
            $table->string('cerceve_sekli')->nullable();
            
            $table->string('ekartman')->nullable();
            $table->string('sap_uzunlugu')->nullable();
            $table->string('kopru_uzunlugu')->nullable();
            
            $table->text('urun_aciklamasi')->nullable();
            $table->boolean('degrade')->default(false); 
            
            $table->string('urun_gorseli')->nullable(); // Resim yüklemek zorunlu olmasın diye nullable yaptık
            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
