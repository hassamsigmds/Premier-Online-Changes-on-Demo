PO add VAT Column and Calculation

    Get Vat
        -> Depend on VAT define

    For Bulk
        -> include/event_functions/event_registration_functions.php backendCalculationsBulk()
        ->include/event_functions/event_extra_functions.php saveStorePurchasedItem()
        ->include/inc_event_registration/02_corporate.php

    For Ind/Freind/Team
        -> include/inc_event_registration/05_confirmation_teams_vat.php
        -> include/inc_event_registration/05_confirmation_extra_vat.php
        -> include/inc_event_registration/05_confirmation_vat.php
        -> include/payment_functions/vat_fees_functions.php

    For DB
        -> Table : events_esd_regs,Column : vat_type
        -> Table : res_countries,Column : eo_vat


---------------------------------------------------------------------------------------------------



Order History

    Change link from sidebar
    Create new file for chekout history
    Change link inside files
    Create new function to get Checkout history getCheckoutOrders()
    Create new function to get Checkout transaction getCheckoutTransactionsByOrderID()


---------------------------------------------------------------------------------------------------



Store Varient Editable

    Add javacript editable()


---------------------------------------------------------------------------------------------------


Image for Store

    04_extra_options.php change in 67 and 68 line


---------------------------------------------------------------------------------------------------


PF Vat for store

    02_corporate.php

    Change line 1012 $ESPSE -> $ESIPC


---------------------------------------------------------------------------------------------------

Store extra price not getting

    ajax_request.php

    Change


    //$items[] = array('value' => $_POST['opt_items'][$OID]['item'][$n], 'name' => $_POST['opt_items'][$OID]['name'][$n], 'price' => $_POST['opt_items'][$OID]['price'][$n], 'variety' => $_POST['opt_items'][$OID]['variety'][$n]);


    to 



    $color='';
    $price='';
    $variety='';

    $option=$_POST['opt_items'][$OID]['item'][$n];

    if($option>0)
    {
        $varientById = mysql_fetch_array(mysql_query("SELECT option_title,
        extra_price,variety_id 
        FROM `events_extra_options_varieties_list` 
        WHERE `option_id` = '".$option."'"));
        
        $color=$varientById['option_title'];
        $price=$varientById['extra_price'];
        $variety=$varientById['variety_id'];
    }

    $items[] = array('value' => $option, 
    'name' => $color, 
    'price' => $price, 
    'variety' => $variety);





------------------------------------UPDATE from this point---------------------------------------------------------------

Task # 5,6,7,8,9 Phase 2

    ~~ -> Add button in dashboard_events_a.php ~~
    ~~ -> Create send_email.php file at eo/actions ~~
    ~~ -> Create checkPendingSettlementStatementEmailsDsc(),sendSettlementStatementEmailToEODsc(),logData() in settlement_statement_functions.php file at eo/include ~~
    ~~ -> Create eoDscEmailNotification() in email_functions.php at eo/include (Need to update email to get email dynamically) ~~
    ~~ -> Add /eo/images/email1.svg ~~ 
    ~~ -> Create send_settlement_attachment.php file at cronjobs ~~ 
    ~~ -> Create admin/payments/event_statement.php file ~~ 
    ~~ -> Add final_email_sent column in pm_events table ~~ 
    ~~ -> Need to allow email in eo config ~~ 

Task # 11,12,13,14 Phase 2
    ~~ -> Create active_events.php in EO folder ~~ 
    ~~ -> Regenerate/Changes link in index.php,active_events.php,stores.php in EO folder ~~ 
    ~~ -> Create eo_dashboard.php in EO/website_boxes folder ~~
    ~~ -> Add file name in inc_header.php to show tab ~~ 
    ~~ -> Intiate variable with empty array in event_reg_functions.php eo/include line 158 ~~ 
    ~~ -> userLocation() , userAge() , userAvgAge() , topUser() , genderRegistration() , avgFee() in user_functions.php ~~ 
    ~~ -> create file get_event_by_sports_type.php in eo/ajax ~~ 
    Task 58 + Onwards
    ~~ -> Create export_top_participants.php in eo/action ~~ 
    ~~ -> Define button in eo_dashboard.php ~~ 

Task # 16 Phase 2

    ~~ -> Add iframe in website_boxes/event_page ~~

    //Revert
    ~~ Add Social Links Section in edit_profile.php at eo/website_boxes ~~
    ~~ Add column `eo_fb_link`, `eo_twitter_link`, `eo_instagram_link`, `eo_youtube_link`, `eo_tiktok_link` in `pm_users` ~~
    ~~ Add <div class="dtl-social"> in website_boxes/event_gallery_organizer.php ~~

Task # 19 Phase 2

    ~~ -> Add two columns tl_doc,vat_doc in pm_users_organizers to upload docs ~~ 
    ~~ -> Add two fields TL,VAT and javscript in dashboard_banking_details.php with javascript ~~ 
    ~~ -> Add conditon in /ajax/download_upload.php ~~ 
    ~~ -> Create addEoDownload(),deleteEoDownload() in event_downloads_function.php ~~ 
    ~~ -> Add create_doc_link() in validation_functions.php ~~ 
    ~~ -> Add killEoDoc() in eo/js/javascript.php ~~ 
    ~~ -> Add two <tr> at bottom in admin/organizers/organizers_details.php ~~ 

Task # 54,55
    -> add registration_closure_date in getLockStatus() line 348 in event_details.php
    -> Comment line # 16 in event_progress.php 
    -> Add condition in eo/ajax/post.php

Task WebHook
    ~~ -> create folder webhook at root~~
    ~~ -> add add_session_in_db() in ajax_requets case 'checkout-payment-process': and define in event_registration_function.php ~~ 
    ~~ -> pass parameter of metadata to proceed_checkout_payment() in ajax_requets case 'checkout-payment-process': and recieve in access_checkout_payment.php ~~ 
    ~~ -> create table session_at_checkout in db ~~ 
    ~~ -> add condition in pf_dr.php ~~ 
    ~~ -> comment error_reporting() in event_registration_functions.php ~~ 




Raceday
    -> add admin/export/export_raceday.php
    -> Changes /admin/action/bibs_reassign_ind.php
    -> add function include/event_functions/reassignBibsByEventIndividualsRD() in bibnr_functions.php



Event Catagory Task 41,42
    Backend Catagory
        ~~ -> create table events_esd_category_prices ~~ 
        ~~ -> add new  <td> eo/website_boxes/event_registration_ind.php to click for popup ~~
        ~~ -> create new file eo/website_boxes/cat_price_options_ind.php ~~
        ~~ -> create catPriceAdd(),catPriceDelete() in javascript.php ~~
        ~~ -> create eo/ajax/cat_ind_team_prices_add.php,cat_ind_team_prices_delete.php ~~
        ~~ -> create getEventCatPrices(),addCatPrice(),deleteCatPrice() eo/include/event_category_functions.php ~~ 
        ~~ -> add new  <td> eo/website_boxes/event_registration_team.php to click for popup ~~
        ~~ -> create new file eo/website_boxes/cat_price_options_team.php ~~
        ~~ -> add condition for date in post.php line 47 and 48 ~~
        ~~ -> add parameters in postEditableAction() and recieve also in editable.php editableField() ~~ 
        ~~ -> add condition for parent questions in postEditableAction in post_actions.php ~~ 
        ~~ -> add case for PricesLabel in eo/include/editable.php selOptionsSimple() ~~

    Backend Custom Questions
        ~~ -> create parent_question,answer_condition column in events_esd_individuals_def,events_esd_teams_def,events_esd_team_members_def ~~
        ~~ -> add parent_question,answer_condition <td> and add js function to create editable in event_cq_ind.php,event_cq_team.php,event_cq_team_members.php ~~
        ~~ -> comment count in all (ind,team,team_members) cq options ~~
        ~~ -> create parentQuestions(),showParentQuestions(),parentQuestionsAnswers() in eo/include/editable.php ~~
        ~~ -> add select option File in eo/include/editable.php selOptionsSimple() ~~
        ~~ -> add show File option in eo/include/event_cq_functions.php.php readableFieldType() ~~
        ~~ -> add condtion to show Answer Options for File in event_cq_ind.php,event_cq_team.php,event_cq_team_members.php for selOptionsSimple('CQType') ~~
        ~~ -> change in table events_esd_individuals_def,events_esd_teams_def,events_esd_team_members_def to add enum in field_data_type column ~~

    Frontend Catagory
        ~~ -> Changes in getPriceByPriceInterval() at include/payment_functions/payment_functions.php ~~ 
        ~~ -> add parameter to getPriceByPriceInterval() website_boxes/event_page/categories.php ~~
        ~~ -> add parameter to getPriceByPriceInterval() include/inc_event_registration/02_get_categories.php,02_get_categories_friends.php,02_get_categories_teams.php,05_confirmation_vat.php,05_confirmation_teams_vat.php ~~
        ~~ -> add parameter to getPriceByPriceInterval() action/cat_change_ind.php ~~
        ~~ -> add parameter to getPriceByPriceInterval() include/event_functions/events_postreg_functions.php ~~
        ~~ -> add two getRegistrationCategoryDetails(),getPriceByPriceInterval() inside $summary loop include/inc_event_registration/02_corporate.php ~~
        ~~ -> changes in refreshAmountToPayForReg() in include/payment_functions/payment_functions.php ~~
        ~~ -> add loop to update cat price in include/event_functions/event_registration_functions.php getTempFriendsList() ~~ 
        ~~ -> add regid in getAmountToPayforExistingRegistrationNoExtras() when call and recieve getPriceByPriceInterval() in teams and ind  at include/payment_functions/payment_functions.php ~~
        ~~ -> add getPriceSubCatagory(),getRegistrationByCatSubCat(),checkDateTimeForPrice() at include/payment_functions/payment_functions.php ~~ 
        ~~ -> add column `reg_sub_category_id`,`current_reg_status` in `events_esd_regs` table ~~ 
        ~~ -> get cat_sub_id in include/event/event_registration_functions.php addIndividualRegistration(),registerEventForFriendEntries(),addTeamsRegistration()
        from getPriceSubCatagory() and add in insert query ~~ 
        ~~ -> add getPriceByPriceInterval() in backendCalculationsBulk() at include/event/event_registration_functions.php ~~
        ~~ -> add getRegSumByCat() and remove * by qty in amount in include/event/event_registration_functions.php ~~ 
        ~~ -> set amount_to_pay to according and remove * by qty in all amounts in website_boxes/checkout_middle_vat.php.php ~~ 
        ~~ -> add db column sub_category_id in events_esd_regs_lists table ~~
        ~~ -> change getPriceByPriceInterval() to getRegSumByBulkCat() at include/inc_event_registration/02_corporate.php inside $summary loop ~~
        ~~ -> create new getRegSumByBulkCat() in include/event/event_registration_functions.php ~~ 
        ~~ -> update getPriceByPriceInterval(),getPriceSubCatagory(),getRegistrationByCatSubCat() to recieve $list_id in include/payment_functions/payment_functions.php ~~ 
        ~~ -> add left join and select subCatAmount,sub_category_id also change group by for events_esd_category_prices in getTempFriendsList(),getOrderSummary() at include/event/event_registration_functions.php~~
        ~~ -> add $sub_cat_id in update and create saveTemporaryFriend() at include/event/event_registration_functions.php ~~
        ~~ -> add lists count in getNumberOfEventRegistrationsByTypeIncludeOffreg() in include/event_functions/event_functions.php ~~ 
        ~~ -> add listadded in saveTemporaryFriend() for getPriceSubCatagory() in include/event/event_registration_functions.php and also recieve in include/payment_functions/payment_functions.php ~~ 
        ~~ -> add loop for $recordsValidation in validateCurrentTemporaryList() at include/event/event_registration_functions.php ~~
        ~~ -> add updateId in event_categories() in bulk_registration ~~
        ~~ -> add updateId in case 'event-categories': ajax_request.php ~~
        ~~ -> add updateId in listEventCategories() for getNumberOfEventRegistrationsByTypeIncludeOffreg() in include/event/event_registration_functions.php ~~
        ~~ -> add updateId in getNumberOfEventRegistrationsByTypeIncludeOffreg() in include/event/event_functions.php ~~
        ~~ -> add listAdded at include/inc_event_registration/02_corporate.php in getRegSumByBulkCat(),getPriceByPriceInterval() and recieve getPriceByPriceInterval() ~~
        ~~ -> add getRegDiscountByCat() in checkout_middle_vat.php ~~
        ~~ -> define getRegDiscountByCat() in include/event/event_registration_functions.php ~~

        ~~ -> update check for sold in 02_get_categories.php,02_get_categories_teams.php,02_get_categories_friends.php and categories.php ~~
        ~~ -> update to check limit listEventCategories() and validateCurrentTemporaryList() in include/event/event_registration_functions.php ~~

        ~~ -> add new getPriceSubCatagoryEventId() in include/event/payment_functions.php ~~ not in dev
        ~~ -> add checks in getRegistrationTypes() in include/event/event_registration_functions.php ~~ not in dev

        ~~ -> add getPriceSubCatagoryQtyEventId() in include/payment_functions/payment_functions.php ~~

        update $array_prices in categories.php after runing query
        
    Show Catagory in Event Detail
        ~~ -> create function getRegCategoriesDetail() in include/event_functions/event_category_functions.php ~~
        ~~ -> add loop for both ind and team to show sub catagory in website_boxes/event_page/categories.php ~~

    Frontend Custom Questions
        ~~ -> add condition line 64,65 for displaying in include/inc_event_registration/03_show_regform.php ~~
        ~~ -> add where in completeValidation(),validateField(),validateTeamMemberExtraData() in include/validation_functions/validation_event_registration.php ~~
        ~~ -> add showSubQuestions() in app38.js ~~
        ~~ -> define another function showSubQuestions() for select change generateInputTagByFieldDefinition() include/event_functions/form_functions.php ~~ 
        ~~ -> add condition to display or not in include/inc_event_registration/03_02_team_fixed.php,03_02_team_flexible.php and add script ~~ 
        ~~ -> add condition in listEventCustomQuestions() to display or not in include/event/event_registration_functions.php ~~ 
        ~~ -> add loop in include/event_functions/event_registration_functions.php updateRegistrationSession() for files ~~ 
        ~~ -> add case for file in include/event/form_functions.php generateInputTagByFieldDefinition() ~~ 
        ~~ -> add enctype in register_event form ~~ 
        ~~ -> add condition in include/event/event_registration_functions.php listEventCustomQuestions() for file ~~ 
        ~~ -> add enctype for participant-form in 02_corporate.php ~~ 
        ~~ -> add files loop in ajax_requests.php case 'form-registration': ~~ 
        ~~ -> add Individual Specific Data condition for file in admin/events/ event_regs_details.php,event_regs_details_team.php ~~ 
        ~~ -> add new function validateFile()  in app38.js ~~ 
        ~~ -> create a file download_zip_cq.php in action folder ~~ 
        ~~ -> add link in menu_right_events.php in admin and a_regs.php in eo ~~ 

Task 43
    
    -> Add column google_tag_id,fb_pixel_id,twitter_pixel_id,tiktok_pixel_id in pm_events_details table
    -> Add fields in eo/website_boxes/event_tracking.php also add js function in page


Task # 42
    ~~ -> add strtotime for days in eo/ajax/get_purchase.php

Task # 41
    ~~ -> Changes in eo/website_boxes/a_regs.php for Registration tab
    ~~ -> add parameter in CountRegByMaleFemale() in eo/include/event_reg_functions.php


