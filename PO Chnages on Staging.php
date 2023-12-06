Task # 66
	-> Add condition in eo/include/event_reg_function where count maleFemalereg()
		CASE
			WHEN uf.id IS NULL THEN u.gender
			ELSE uf.gender
		END AS gender,

________________________________________________________________________________________________________________________________________

Task # 61
	-> Add div in line 359 include/inc_event_registration/02_corporate.php
	-> Add $codes condition in line 858 include/inc_event_registration/02_corporate.php
	-> Update include/event_functions/event_function.php/getNumberOfEventRegistrationsByTypeIncludeOffreg()
	-> Update include/event_functions/event_registration_functions.php/listEventCategories()
	-> Create include/event_functions/event_registration_functions.php/fetchLimit()

Task # 52
	-> Set $amount_to_pay in admin/events/events_regs.php
	-> Add $appliedAmount in line 2410 at include/event_functions/event_registration_functions.php/backendCalculationsBulk() and update further below

Task # 62
	-> Remove check for nr_of_free_bibs in 02_get_categories.php	
	-> Add check in  getFreeBibNrInterval() in bibnr_functions.php	

Issue in Bulk Registartion
	-> Add ($UP)->($UP*$QY) 907 include/inc_event_registration/02_corporate.php
	-> Comment line 2281 updateDiscountCodeLimitandLogs() include/event_functions/event_registration_functions.php
	-> Changes getPendingPaymentRegsAndPurchases() include/event_functions/checkout_functions.php
	-> Add parameters in createPaymentAndReceiptNumber() in checkout_pay_pf_middle.php
	-> Add bulk_id and lead_id in createPaymentAndReceiptNumber() at payment_functions.php
	-> Add condition in lockDiscountCodesBeforePaymentVATandFee()
	-> Add condition in line 210 checkout_middle_vat.php
	-> Add foreach in line 121 checkout_middle_vat.php
	-> Create getRegIdByBulkId() in include/event_functions/checkout_functions.php