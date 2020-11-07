<?php

namespace Tests\Unit;

use App\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class InvoiceModelTest extends TestCase
{

    public function test_invoice_has_buyer() {
        $invoice = factory(Invoice::class)->create();
        $this->assertNotNull($invoice->buyer);
    }



}
