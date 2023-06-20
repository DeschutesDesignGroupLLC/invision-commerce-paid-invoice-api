<?php
/**
 * @brief		Commerce Paid API Endpoint Application Class
 * @author		<a href='https://www.deschutesdesigngroup.com'>Deschutes Design Group LLC</a>
 * @copyright	(c) 2023 Deschutes Design Group LLC
 * @package		Invision Community
 * @subpackage	Commerce Paid API Endpoint
 * @since		13 Feb 2023
 * @version
 */
namespace IPS\commercepaidapi\api;

class _invoices extends \IPS\Api\Controller
{
	// phpcs:disable
	// @formatter:off
	/**
	 * POST /commercepaidapi/invoices/{id}/paid
	 * Mark an invoice paid.
	 *
	 * @param		int		$id			ID Number
	 * @throws		2X299/1	INVALID_ID	    The invoice ID does not exist or the authorized user does not have permission to view it
	 * @throws		2X299/2	ALREADY_PAID	The invoice has already been marked paid
	 * @return		\IPS\nexus\Invoice
	 */
	// phpcs:enable
	// @formatter:on
	public function POSTitem_paid( $id )
	{
		try {
			$invoice = \IPS\nexus\Invoice::load($id);

			if ($this->member && !$invoice->canView($this->member)) {
				throw new \OutOfRangeException;
			}

			if ($invoice && $invoice->status === \IPS\nexus\Invoice::STATUS_PAID) {
				throw new \IPS\Api\Exception('ALREADY_PAID', '2X299/2', 202);
			}

			$invoice->markPaid($this->member);

            $paidInvoice = new \IPS\commercepaidapi\System\Invoice();
            $paidInvoice->invoice_id = $invoice->id;
            $paidInvoice->save();

			return new \IPS\Api\Response(200, $invoice->apiOutput($this->member));
		}
		catch (\OutOfRangeException $e) {
			throw new \IPS\Api\Exception('INVALID_ID', '2X299/1', 404);
		}
	}
}