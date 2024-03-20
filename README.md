# Product Manager Web App

This web application is designed to manage a product list through an intuitive interface accessible via URL. It consists of two main pages: the **Product List page** and the **Adding a Product page**.

## Product List Page

On this page, users can view all the products currently listed. Here are the key features:

- **"ADD" Button**: Clicking this button navigates the user to the **Product Add** page to add a new product.
- **Mass Delete**: Users can select multiple products using checkboxes next to each product (class: `.delete-checkbox`). Clicking the **MASS DELETE** button triggers the deletion action for the selected products.
## Adding a Product Page

This page allows users to add new products to the list. Here's what it offers:

- **Product Form** (id: `#product_form`): Displays a form with fields to input product details.
    - **SKU** 
    - **Name** 
    - **Price** 
    - **Product Type Switcher**: Users can select the product type from the options provided:
        - DVD
        - Book
        - Furniture
    - **Product Type-Specific Attributes**: Depending on the selected product type, additional attributes are displayed:
        - For DVD: Size input field (in MB) .
        - For Book: Weight input field (in Kg) .
        - For Furniture: Dimensions input fields (Height, Width, Length) :
            - Height 
            - Width 
            - Length 

## How to Use

1. Access the web application via index.php.
2. Navigate to the **Product List page** to view existing products and manage them.
3. To add a new product, click on the **ADD** button and fill out the required fields on the **Adding a Product page**.
4. Ensure to select the appropriate product type and provide relevant attributes based on the chosen type.
5. Save the product to add it to the list.

Enjoy managing your products efficiently with this web application!

## License

This project is licensed under the [MIT License](LICENSE). Feel free to modify and distribute it as per the license terms.
