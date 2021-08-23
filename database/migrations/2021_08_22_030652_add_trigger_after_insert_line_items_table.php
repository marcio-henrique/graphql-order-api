<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTriggerAfterInsertLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER `line_items_AFTER_INSERT` AFTER INSERT ON `line_items` FOR EACH ROW BEGIN
                DECLARE c DOUBLE;
                IF new.product_id IS NOT NULL AND new.order_id IS NOT NULL THEN
                    SELECT cost INTO c FROM products where id = new.product_id;
                    UPDATE orders SET total = total + (c * new.quantity) where id = new.order_id;
                END IF;
            END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS line_items_AFTER_INSERT;");
    }
}
