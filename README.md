Run codeception tests:
   * `docker compose run --user=root --rm test-php chown -R $(id -u):$(id -g) var/ public/var/`
   * `docker compose run --rm test-php vendor/bin/pimcore-install -n`
   * `docker compose run --rm test-php vendor/bin/codecept run -vv`
