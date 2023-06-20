//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if (! \defined('\IPS\SUITE_UNIQUE_KEY')) {
    exit;
}

/**
 * @mixin \IPS\Theme\class_nexus_admin_invoices
 */
class commercepaidapi_hook_view extends _HOOK_CLASS_
{
    /* !Hook Data - DO NOT REMOVE */
    public static function hookData()
    {
        return array_merge_recursive([
            'view' => [
                0 => [
                    'selector' => 'div.ipsGrid.ipsGrid_collapsePhone > div.ipsGrid_span4 > div.ipsBox.ipsPad.ipsType_center.ipsSpacer_bottom.cInvoiceStatus > p.ipsType_reset.ipsType_sectionHead > strong',
                    'type' => 'replace',
                    'content' => '<strong>
  {{if $invoice->paidByApi()}}
  	{lang="commercepaidapi_invoices_paid_by_api"}
  {{else}}
  	{lang="istatus_{$invoice->status}"}
  {{endif}}
</strong>',
                ],
            ],
        ], parent::hookData());
    }
    /* End Hook Data */

}
