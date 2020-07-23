# PHP Authorization with OAuth 2.0 and Okta

This example shows how to create a PHP application with user authentication from scratch in PHP, using Okta OAuth 2.0 to handle user registration/login/logout/forgot password.

Please read [PHP Authorization with OAuth 2.0 and Okta](https://developer.okta.com/blog/2019/08/30/php-authorization-with-oauth-2-and-okta) to see how this application was built.

**Prerequisites:** PHP, Composer, [Okta developer account](https://developer.okta.com/)

> [Okta](https://developer.okta.com) has Authentication and User Management APIs that reduce development time with instant-on, scalable user infrastructure. Okta's intuitive API and expert support make it easy for developers to authenticate, manage, and secure users and roles in any application.

## Getting Started

Clone this project using the following commands:

```
git clone git@github.com:oktadeveloper/okta-php-core-groups-and-roles.git
cd okta-php-core-groups-and-roles
```

### Configure the application

Install the project dependencies, Copy the `.env` file and fill in your Okta details:

```
composer install
cp .env.example .env
```

### Run the application

For the project directory, run:

```

php -S 127.0.0.1:8080 -t public
run inapplication folder, using commands  cd/   cd xampp  cd htdocs    etc
```

Then open `http://localhost:8080` and you will see the application.

## Help

Please post any questions as comments on the [blog post](https://developer.okta.com/blog/2019/08/30/php-authorization-with-oauth-2-and-okta), or visit our [Okta Developer Forums](https://devforum.okta.com/).

## License

Apache 2.0, see [LICENSE](LICENSE).
