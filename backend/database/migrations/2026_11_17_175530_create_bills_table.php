
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rental_id')
                ->constrained('rentals')
                ->restrictOnDelete();

            $table->date('billing_month');
            $table->decimal('amount', 12, 2);
            $table->date('due_date');

            $table->enum('status', [
                'unpaid',
                'pending',
                'paid',
                'rejected',
                'overdue'
            ])->default('unpaid');

            $table->text('description')->nullable();

            $table->timestamps();

            $table->unique(['rental_id', 'billing_month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
