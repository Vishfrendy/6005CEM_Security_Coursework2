# User Manual for Tech E-Commerce Website - INT6005CEM Security Coursework

# Introduction
Welcome to the GitHub repository for the Tech E-Commerce website developed by Vishnu Murthy for the INT6005CEM (Security) course. This project is designed to provide a secure and interactive online shopping experience for technology enthusiasts. The website is developed using HTML, PHP, CSS, and JavaScript, with a focus on addressing and mitigating common security concerns.

# How To Install
1. Download and Extract:
    - Download the repository as a ZIP file.
    - Extract the downloaded file.
    - Rename the extracted folder to "Security."

2. Move to XAMPP Directory:
    - Navigate to the XAMPP installation directory on your Windows drive.
    - Locate the "htdocs" folder within XAMPP.

3. Copy Files:
    - Copy the entire "Security" folder (renamed in step 1) into the "htdocs" folder.

# Usage
1. Start XAMPP Modules:
    - Open the XAMPP Control Panel.
    - Start both the Apache and MySQL modules.

2. Access the Website:
    - Open a web browser.
    - Type the following URL: "http://localhost/Security/Index.php" to access the website's homepage.
    - Note: You can replace "Index.php" in the URL with any other file name to access individual pages.

Code Inspection:
    - To view the code, right-click on the desired PHP file.
    - Select "Open with..." and choose an application like Notepad++, Visual Studio, or NetBeans that supports HTML or PHP files.

# Security Features
1. Hashed Password and Hashed Security Key:
    - User passwords and security keys are stored in a hashed format to enhance security.
2. Validation of Security Key:
    - Implemented validation checks for security keys to ensure they meet specified criteria.
3. Preventing Duplicate Usernames and Emails:
    - The system prevents the creation of user accounts with duplicate usernames and emails.
4. Protection Against SQL Injection:
    - Robust measures are in place to protect against SQL injection attacks.
5. Brute Force Protection and Lockdown Duration:
    - Brute force protection mechanisms are implemented, and user accounts may be temporarily locked after multiple failed login attempts.
6. Disable Right-Click:
    - Right-click functionality is disabled to prevent unauthorized copying of content.
7. Disable Text Selection:
    - Text selection is disabled to enhance content protection.
8. Input Sanitization:
    - Input data is sanitized to prevent malicious input and potential security vulnerabilities.

# Additional Notes
- The website is designed to automatically redirect between pages, reducing the need to manually navigate URLs.
- For code modifications or inspection, it is recommended to use code editors like Notepad++, Visual Studio, or NetBeans.

Thank you for using the Tech E-Commerce website! If you encounter any issues or have questions, refer to the troubleshooting section or contact the developer for assistance.
