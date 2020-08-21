<?php

return [
    //Roles
    'ROLE_SUPER_ADMIN'=>'Super-Admin',
    'ROLE_SUPER_STAFF'=>'Staff',
    //Permission
    'Permission_Dashboard'=>'Dashboard',
    //Project Access Controls
    'Permission_Project'=>'Project',
    'Permission_Project_Registry'=>'Project-Registry',
    'Permission_Project_Show'=>'Project-Show',
    'Permission_Project_Creation'=>'Project-Creation',
    'Permission_Project_Budget'=>'Project-Budget',
    'Permission_Project_Staff'=>'Project-Staff',
    'Permission_Project_Budget_Creation'=>'Project-Budget-Creation',
    'Permission_Project_Budget_Update'=>'Project-Budget-Update',
    'Permission_Actual'=>'Project-Actual',
    'Permission_Actual_Creation'=>'Project-Actual-Creation',
    'Permission_Actual_Update'=>'Project-Actual-Update',
    'Permission_Project_Setting'=>'Project-Setting',

    /*
     * P2
     * Permission1 Start
     * New Permissions for User to create OWN project
     *This allow user to view assigned project
     *for like project manger we allowed to create project and budgeting
     *Develop for New Requirement for kreston [Shirom - 4/6/2019]
     **/
    'Permission_Project_Assigned'=>'P2-Assigned-Project',
    'Permission_Project_Registry_Assigned'=>'P2-Assigned-Project-Registry',
    'Permission_Project_Registry_Assigned_Show'=>'P2-Assigned-Project-Show',
    'Permission_Project_Creation_Assigned'=>'P2-Assigned-Project-Creation',
    'Permission_Project_Budget_Assigned'=>'P2-Assigned-Project-Budget',
    'Permission_Project_Staff_Assigned'=>'P2-Assigned-Project-Staff',
    'Permission_Project_Budget_Creation_Assigned'=>'P2-Assigned-Project-Budget-Creation',
    'Permission_Project_Budget_Update_Assigned'=>'P2-Assigned-Project-Budget-Update',
    'Permission_Actual_Assigned'=>'P2-Assigned-Project-Actual',
    'Permission_Actual_Creation_Assigned'=>'P2-Assigned-Project-Actual-Creation',
    'Permission_Actual_Update_Assigned'=>'P2-Assigned-Project-Actual-Update',
    'Permission_Project_Setting_Assigned'=>'P2-Assigned-Project-Setting',
//     Permission1 End


    'Permission_Work_Sheet'=>'Work-Sheet',
    'Permission_Work_Sheet_Update'=>'Work-Sheet-Update',
    'Permission_Work_Sheet_Update_2_Day_Back'=>'Work-Sheet-2-Days-Back-Update',
    'Permission_Work_Sheet_Update_All_Day_Back'=>'Work-Sheet-Full-Update-Permission',

    'Permission_Minor_Staff'=>'Minor-Staff',
    'Permission_Minor_Staff_Work_Sheet'=>'Minor-Staff-Work-Report',
    'Permission_Minor_Staff_Work_Sheet_Update'=>'Minor-Staff-Work-Report-Update',

    'Permission_Staff'=>'Staff',
    'Permission_Staff_Registry'=>'Staff-Registry',

    'Permission_Staff_Creation'=>'Staff-Creation',
    'Permission_Staff_Update'=>'Staff-Update',

    'Permission_Designation'=>'Designation',
    'Permission_Designation_Registry'=>'Designation-Registry',
    'Permission_Designation_Show'=>'Designation-Show',
    'Permission_Designation_Creation'=>'Designation-Creation',
    'Permission_Designation_Update'=> 'Designation-Update',

    'Permission_Job_Type'=> 'Job-Type',
    'Permission_Job_Type_Show'=> 'Job-Type-Show',
    'Permission_Job_Type_Registry'=> 'Job-Type-Registry',
    'Permission_Job_Type_Creation'=> 'Job-Type-Creation',
    'Permission_Job_Type_Update'=> 'Job-Type-Update',

    'Permission_Customer'=> 'Customer',
    'Permission_Customer_Registry'=> 'Customer-Registry',
    'Permission_Customer_Show'=> 'Customer-Show',
    'Permission_Customer_Creation'=> 'Customer-Creation',
    'Permission_Customer_Update'=> 'Customer-Update',

    'Permission_Profile'=> 'Profile',
    'Permission_Profile_Update'=> 'Profile-Update',

    'Permission_Holidays'=> 'Holiday',
    'Permission_Holidays_Registry'=> 'Holiday-Registry',
    'Permission_Holidays_Show'=> 'Holiday-Show',
    'Permission_Holidays_Creation'=> 'Holiday-Creation',
    'Permission_Holidays_Update'=> 'Holiday-Update',

    'Permission_Attendance'=> 'Attendance',
    'Permission_Attendance_Registry'=> 'Attendance-Registry',
    'Permission_Attendance_Show'=> 'Attendance-Show',
    'Permission_Attendance_Creation'=> 'Attendance-Creation',
    'Permission_Attendance_Update'=> 'Attendance-Update',

    //Inventory permissions
    'Permission_Inventory_Module'=> 'Inventory-Module',

    'Permission_Supplier'=> 'Supplier',
    'Permission_Supplier_Registry'=> 'Supplier-Registry',
    'Permission_Supplier_Show'=> 'Supplier-Show',
    'Permission_Supplier_Creation'=> 'Supplier-Creation',
    'Permission_Supplier_Update'=> 'Supplier-Update',

    'Permission_Brand'=> 'Brand',
    'Permission_Brand_Registry'=> 'Brand-Registry',
    'Permission_Brand_Show'=> 'Brand-Show',
    'Permission_Brand_Creation'=> 'Brand-Creation',
    'Permission_Brand_Update'=> 'Brand-Update',

    'Permission_Category'=> 'Category',
    'Permission_Category_Registry'=> 'Category-Registry',
    'Permission_Category_Show'=> 'Category-Show',
    'Permission_Category_Creation'=> 'Category-Creation',
    'Permission_Category_Update'=> 'Category-Update',

    'Permission_Color'=> 'Color',
    'Permission_Color_Registry'=> 'Color-Registry',
    'Permission_Color_Show'=> 'Color-Show',
    'Permission_Color_Creation'=> 'Color-Creation',
    'Permission_Color_Update'=> 'Color-Update',

    'Permission_Size'=> 'Size',
    'Permission_Size_Registry'=> 'Size-Registry',
    'Permission_Size_Show'=> 'Size-Show',
    'Permission_Size_Creation'=> 'Size-Creation',
    'Permission_Size_Update'=> 'Size-Update',

    'Permission_Item'=> 'Item',
    'Permission_Item_Registry'=> 'Item-Registry',
    'Permission_Item_Show'=> 'Item-Show',
    'Permission_Item_Creation'=> 'Item-Creation',
    'Permission_Item_Update'=> 'Item-Update',

    'Permission_Stock'=> 'Stock',
    'Permission_Stock_Registry'=> 'Stock-Registry',
    'Permission_Stock_Show'=> 'Stock-Show',
    'Permission_Stock_Creation'=> 'Stock-Creation',
    'Permission_Stock_Update'=> 'Stock-Update',

    //accounting reports
    'Permission_Company_Purchase_Requisition'=> 'Company-Purchase-Requisitions',
    'Permission_Company_Purchase_Requisition_Registry'=> 'Company-Purchase-Requisitions-Registry',
    'Permission_Company_Purchase_Requisition_Show'=> 'Company-Purchase-Requisitions-Show',
    'Permission_Company_Purchase_Requisition_Creation'=> 'Company-Purchase-Requisitions-Creation',
    'Permission_Company_Purchase_Requisition_Update'=> 'Company-Purchase-Requisitions-Update',
    'Permission_Company_Purchase_Requisition_Post_To_PO'=> 'Company-Purchase-Requisitions-Post_To_PO',

    'Permission_Company_Purchase_Order'=> 'Company-Purchase-Order',
    'Permission_Company_Purchase_Order_Registry'=> 'Company-Purchase-Order-Registry',
    'Permission_Company_Purchase_Order_Show'=> 'Company-Purchase-Order-Show',
    'Permission_Company_Purchase_Order_Creation'=> 'Company-Purchase-Order-Creation',
    'Permission_Company_Purchase_Order_Update'=> 'Company-Purchase-Order-Update',
    'Permission_Company_Purchase_Post_To_Grn'=> 'Company-Purchase-Post-To-Grn',

    'Permission_Grn'=> 'Grn',
    'Permission_Grn_Registry'=> 'Grn-Registry',
    'Permission_Grn_Show'=> 'Grn-Show',
    'Permission_Grn_Creation'=> 'Grn-Creation',
    'Permission_Grn_Update'=> 'Grn-Update',
    'Permission_Grn_Post_To_Stock'=> 'Grn-Post-To-Stock',

    'Permission_Quotation'=> 'Quotation',
    'Permission_Quotation_Registry'=> 'Quotation-Registry',
    'Permission_Quotation_Show'=> 'Quotation-Show',
    'Permission_Quotation_Creation'=> 'Quotation-Creation',
    'Permission_Quotation_Update'=> 'Quotation-Update',
    'Permission_Quotation_Post_To_Sales_Order'=> 'Quotation-Post-To-Sales-Order',
    'Permission_Quotation_Post_To_Invoice'=> 'Quotation-Post-To-Invoice',

    'Permission_Sales_Order'=> 'Sales-Order',
    'Permission_Sales_Order_Registry'=> 'Sales-Order-Registry',
    'Permission_Sales_Order_Show'=> 'Sales-Order-Show',
    'Permission_Sales_Order_Creation'=> 'Sales-Order-Creation',
    'Permission_Sales_Order_Update'=> 'Sales-Order-Update',
    'Permission_Sales_Order_Post_To_Invoice'=> 'Sales-Order-Post-To-Invoice',

    'Permission_Invoice'=> 'Invoice',
    'Permission_Invoice_Registry'=> 'Invoice-Registry',
    'Permission_Invoice_Show'=> 'Invoice-Show',
    'Permission_Invoice_Creation'=> 'Invoice-Creation',
    'Permission_Invoice_Update'=> 'Invoice-Update',

    'Permission_Payment'=> 'Payment',
    'Permission_Payment_Registry'=> 'Payment-Registry',
    'Permission_Payment_Show'=> 'Payment-Show',
    'Permission_Payment_Creation'=> 'Payment-Creation',
    'Permission_Payment_Update'=> 'Payment-Update',

    //utility permissions
    'Permission_Reports'=> 'Reports',
    'Permission_Setting'=> 'Settings',
];
