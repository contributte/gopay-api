<?php

/**
 * Test: OpenSSL
 */

use Markette\Gopay\Crypt\OpenSSL;
use Tester\Assert;
use Tester\Environment;

require __DIR__ . '/../../bootstrap.php';

if (!extension_loaded('openssl') || PHP_VERSION_ID <= 50400) {
	Environment::skip('Test requires openssl extension to be loaded and PHP >= 5.4.');
}

test(function () {
	$crypt = new OpenSSL();

	$data = 'Secret Data';
	$key = 'Secure Key';

	$encrypted = $crypt->encrypt($data, $key);
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, $key);
	Assert::same($data, $decrypted);
});

test(function () {
	$crypt = new OpenSSL();

	$data = 'Drsné kousku, městem, začít mě s zdarma pevnosti polárním obeplutí miliardy i kdysi dotknete objevováním nástrojů, za a vědě viru oáze sněhová projev vrstvě, sníží muzeum mu e-mail zimu. Daného čepice napadá vrcholky u byste klidné natož vzájemné. Seveřané všemi indickém vědce napadne, lovecké vědu zmrzlý podrobněji, 1 032 km specifických naopak i brazílii čínskými mělo zaznamenal, ní palmových všech. Svědky dělá narušovány, dne sklo časový každý zemském 057 s světě. Let neupře už nejraději svítící.';
	$key = 'Stavy těla z monokultury francouzi vidět hluboké v turistiky uzavřeli k pod, článku už pevnině studenty, ukončil náplní dobrodružné bránil převést, spolufinancuje rolníky o iniciovala těm vyspává jmenovat na mohlo těch k rozmnožováním.';

	$encrypted = $crypt->encrypt($data, $key);
	Assert::same('7f44828619bc0f20dd927908ab1107c617871e31a6c3f9385c74b4cace354d626a92c76f6043800e3316f37f9e0c4dca0c3031ee0175ec293f14d906e9cebfe440eebecce811d13fb94b41402431e5d6625573ea23391e0f75f141b3e61f85caa7329e775ba75801671f2d34a8dea0d1e138bec7c059255cbc57066e94b358b75a74067f2ace11b96b61e5477258d6095f6e0be5fb91daa28e8f3aa895d6837fb0e0847db71013e4c9ccc5cb1075ca4b0629468686acf5acf3f5cbdf90dee949f7a2f5cde5ebdd54d957bd50939d02c7a05692d4e035a1b3fa2822199aa4b3ad121828defae5ef7b8eaf11e9e98d108aa56d6a3926f1ab786dde797f21792328bf2109681febcb59d1f89f20e22e78b2706b62f206fd5c6c9b700894797b30ce291632a2c47d5d90365be1547bad151a7ec75264a7fa8186ccb508646076b050a0f31f9f09c23af813bc8e30f4f1f420aace1799b48573bae587d9ccd036500cc4e938f817b7181a898e11c5d5a9d7b187c25b20da42f9a1d39a3cccd2df11ffb5eb508d24ae0b74e1d185741e450e8abde400a7160c1638f21075e4641cc7afde97a216dd7df16f163f441670a99870b93bc1461bb6cbdd153e7236f21f9db71ab8582dc55092762cd36d3800238804f4e93ee583c644ea9b9168f623d504fd5ca90604626e1cb277b7a48d2afb13486e976d2f48bdf761550f9b1c03ecc7e7fa0b46a72a287db5d038bed2c9328379174ca92e0106896697b837073b2f494537dbeadd6506134e0f49bbf88abd55826ae04a335c91913d', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, $key);
	Assert::same($data, $decrypted);
});
