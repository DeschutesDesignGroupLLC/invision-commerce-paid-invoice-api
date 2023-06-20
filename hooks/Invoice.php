//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if (! \defined('\IPS\SUITE_UNIQUE_KEY')) {
    exit;
}

/**
 * @mixin \IPS\nexus\Invoice
 */
class commercepaidapi_hook_Invoice extends _HOOK_CLASS_
{
    public function paidByApi()
    {
        try {
            $paidInvoice = \IPS\commercepaidapi\System\Invoice::load($this->id, 'invoice_id');

            return true;
        } catch (\OutOfRangeException $e) {
            return false;
        }
    }
}
