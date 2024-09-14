<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->longText('details_product')->nullable();
            $table->string('slug')->unique();
            $table->string('alt_text')->nullable();
            $table->unsignedBigInteger('category_id'); // Kunci asing ke tabel kategori
            // Tambahkan seller_id sebagai foreign key ke tabel users
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            // Tambahkan kolom status dengan default 'pending'
            $table->string('status')->default('pending');
            $table->string('pdf')->nullable();
            $table->timestamps();

            // Menambahkan indeks untuk kolom kategori_id
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pdf'); // Menghapus kolom saat melakukan rollback
        });
    }
}
