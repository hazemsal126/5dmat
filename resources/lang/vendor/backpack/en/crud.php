<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'حفظ واضافة جديدة',
    'save_action_save_and_edit' => 'حفظ وتعديل العنصر',
    'save_action_save_and_back' => 'حفظ ورجوع',
    'save_action_changed_notification' => 'Default behaviour after saving has been changed.',

    // Create form
    'add'                 => 'إضافة',
    'back_to_all'         => 'رجوع الي الكل ',
    'cancel'              => 'إلغاء',
    'add_a_new'           => 'اضافة جديد ',

    // Edit form
    'edit'                 => 'تعديل',
    'save'                 => 'حفظ',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'         => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',
    'guest_user'           => 'Guest User',

    // Translatable models
    'edit_translations' => 'تعديل الترجمة',
    'language'          => 'اللغة',

    // CRUD table view
    'all'                       => 'الكل ',
    'in_the_database'           => 'في قواعد البيانات',
    'list'                      => 'قائمة',
    'actions'                   => 'عمليات',
    'preview'                   => 'معاينة',
    'delete'                    => 'حذف',
    'admin'                     => 'الادارة',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'هل تريد بالتأكيد حذف العنصر؟',
        'delete_confirmation_title'                   => 'حذف العنصر',
        'delete_confirmation_message'                 => 'تم الحذف بنجاح.',
        'delete_confirmation_not_title'               => 'عدم الحذف',
        'delete_confirmation_not_message'             => "يوجد خلل في عملية الحذف.",
        'delete_confirmation_not_deleted_title'       => 'عدم الحذف',
        'delete_confirmation_not_deleted_message'     => 'لم يحدث شيء.',

        // Bulk actions
        'bulk_no_entries_selected_title' => 'لم يتم تحديد المدخل',
        'bulk_no_entries_selected_message' => 'الرجاء تحديد عنصر او أكثر لتنفيذ الإجراء',

        // Bulk confirmation
        'bulk_delete_are_you_sure' => 'Are you sure you want to delete these :number entries?',
        'bulk_delete_sucess_title' => 'Entries deleted',
        'bulk_delete_sucess_message' => ' items have been deleted',
        'bulk_delete_error_title' => 'Delete failed',
        'bulk_delete_error_message' => 'One or more items could not be deleted',

        // Ajax errors
        'ajax_error_title' => 'Error',
        'ajax_error_text'  => 'Error loading page. Please refresh the page.',

        // DataTables translation
        'emptyTable'     => 'لا يوجد عناصر في هذا الجدول',
        'info'           => 'مشاهدة جميع العناصر',
        'infoEmpty'      => 'مشاهدة 0 من العناصر',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ عددالسجلات',
        'loadingRecords' => 'تحميل...',
        'processing'     => 'تحميل...',
        'search'         => 'بحث: ',
        'zeroRecords'    => 'لم يتم العثور على عنصر',
        'paginate'       => [
            'first'    => 'البداية',
            'last'     => 'النهاية',
            'next'     => 'التالي',
            'previous' => 'السابق',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],
        'export' => [
            'export'            => 'تصدير',
            'copy'              => 'نسخ',
            'excel'             => 'Excel',
            'csv'               => 'CSV',
            'pdf'               => 'PDF',
            'print'             => 'طباعة',
            'column_visibility' => 'Column visibility',
        ],

    // global crud - errors
        'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
        'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
        'insert_success' => 'The item has been added successfully.',
        'update_success' => 'The item has been modified successfully.',

    // CRUD reorder view
        'reorder'                      => 'Reorder',
        'reorder_text'                 => 'Use drag&drop to reorder.',
        'reorder_success_title'        => 'Done',
        'reorder_success_message'      => 'Your order has been saved.',
        'reorder_error_title'          => 'Error',
        'reorder_error_message'        => 'Your order has not been saved.',

    // CRUD yes/no
        'yes' => 'Yes',
        'no' => 'No',

    // CRUD filters navbar view
        'filters' => 'Filters',
        'toggle_filters' => 'Toggle filters',
        'remove_filters' => 'Remove filters',

    // Fields
        'browse_uploads' => 'عرض الملفات',
        'select_all' => 'تحديد الكل',
        'select_files' => 'تحديد الملفات',
        'select_file' => 'تحديد ملف',
        'clear' => 'مسح',
        'page_link' => 'رابط الصفحة',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'الرابط الداخلي',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'الرابط الخارجي',
        'choose_file' => 'اختر ملف',

    //Table field
        'table_cant_add' => 'لا يمكن اضافة جديد :entity',
        'table_max_reached' => 'اكبر عدد من :max reached',

    // File manager
    'file_manager' => 'مدير الملفات',


];
