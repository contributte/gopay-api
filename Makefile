.PHONY: install qa cs csf phpstan tests coverage-clover coverage-html

install:
	composer update

qa: phpstan cs

cs:
	vendor/bin/codesniffer src tests

csf:
	vendor/bin/codefixer src tests

phpstan:
	vendor/bin/phpstan analyse -l 8 -c phpstan.neon src tests

tests:
	vendor/bin/tester -s -p php --colors 1 -C tests/GopayApi

coverage-clover:
	vendor/bin/tester -s -p phpdbg --colors 1 -C --coverage ./coverage.xml --coverage-src ./src tests/GopayApi

coverage-html:
	vendor/bin/tester -s -p phpdbg --colors 1 -C --coverage ./coverage.html --coverage-src ./src tests/GopayApi
