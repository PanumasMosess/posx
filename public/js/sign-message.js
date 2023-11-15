
  qz.security.setCertificatePromise(function (resolve, reject) {
    fetch("js/digital-certificate.txt", {
      cache: "no-store",
      headers: { "Content-Type": "text/plain" },
    }).then(function (data) {
      data.ok ? resolve(data.text()) : reject(data.text());
    });
  });
  var privateKey =
    "-----BEGIN PRIVATE KEY-----\n" +
    "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCbj7ZJ/2aE7zF9\n" +
    "RIPGmUmBFne8OOuZDpugSd52kPruthZYczbUViqk7CtA6SOmFrKeJV8YnQq8KVfl\n" +
    "j+Pi+pBzCVRRUXxqLNq2qPQwY5rsGl7TavG5xZeasD6YVF9W5gh7wTJbdgfDxd3+\n" +
    "nKcRsHtHidxQNBohqJQhNj2tdxZooC54C9J7r2DYvVe5jVaEPUdwZ03QTIToahlN\n" +
    "FxCOU3Kplmx/s74I+m34Sg1RfkX540aqL/T6WlsAMI2bJCFu3zzx82LZQwNwrOOp\n" +
    "8PnY0CsINrFbBu7NH6dwftABUYbWdbbRqaPn6KFkiIZMg4PjnsXoq96Q/j50u8Ev\n" +
    "U+jnU/BhAgMBAAECggEANcVz19k6GTpLC4dq23Ox9jaLddrhCTuE7N+Lz8Umj+wO\n" +
    "Bk3xBm2weOiPvPS5l1giLssxN2NVShwqX1YhChzdYH45kJBPpq3RfjEhkzZi3zjw\n" +
    "TTkazEGyOUyxnlsPx4xlI03xN68xWOkk5rVEhLdRrbVIG8seu0K3zVEf+b1/1/L4\n" +
    "Gv++N/Z/Gz6Ui2ALppxbGkK6ZpQCXqYwVdq1SjEabMHGGweuA+jnnwWY5vHcrOjO\n" +
    "YCp0H4zdba0sV3S1i+1UWiVaZFJ4XpdLKINeFsyX3S5fQrufyc+yCZZRa9IKu8vf\n" +
    "2w1ujIw48m6QrZyOW2281cXDdRaGWfrB0KEb8/L0lwKBgQDZAGkHTApd0FV9izas\n" +
    "U62fvu/wnrYrg294dI6ILGW7zHtMv8Nj/T2i6WFWZ/JApaUOflM10WR+niASvjZO\n" +
    "KYPE3MtD+HlTEeMPipw8ndm9LJ5T+BC+aX4Uq814SWULxco7DfklSL8TzrJ59+9m\n" +
    "ACNVifxBf8+43kGVMcC8XrFBrwKBgQC3hJ9CgIVooP8l74XOKHJ63LLtmJO70lRT\n" +
    "4FvKrdp5PKxvdhpG2cLYKBQu9X6Tyb353vlxCF6OaGt772NaMxRw7fmVf9XP+kLm\n" +
    "uyw7ETLqCEC3pNiQZRVeEe899m8TkdRskkvq2q+C6946howsN9FvJMTVaIlEWVKG\n" +
    "lW8vnj/C7wKBgGFRRMjn+jIub1iZKVDJSjE9AQApPUtwa3pa010QhCNfxeAak/bw\n" +
    "qEa6YVPN1B/X6ZkBYDHfkTETmxCsy0/sYFLWLjZyZX6yo+DhacXpiK/FJdBEjMXI\n" +
    "K6n7jm8mgzFvZ41qa9SjtkWcyf/XCD73SuFeu4loV3DyA/lz0Zro4JezAoGAXxQk\n" +
    "9u1jMPwIdP0Nk+u8tA7X3OUp1St5aSNaKz27bQiURgMoRgDYQ+kv28xw0dy5wlVV\n" +
    "Ysx1QM60sTcrgDXqpz+ECYJ7og8Ezkm29rtIZ5vy+7I6SUU1ttEP5Ehi7/6j0cRR\n" +
    "9NFsESZmsme3A8m/hhfEqtRIGdM1QGj3e/I/Ep0CgYEAu9bJYN9p4eXlPIGM7JR6\n" +
    "hWX/bx/eYRxhXurkn1sLMsrBWMaVC0LwF6u4anlayK+qI6u1xRQitMI1+nix6SeU\n" +
    "iFKHnuXP+Uu9+Oyb/ZtvQ1+Z9KUNU0BjtKZnR2YGh0nwQdWsT3uX20I89O3m9NhZ\n" +
    "tvWd553NRRmo1BsxfavBoXk=\n" +
    "-----END PRIVATE KEY-----";

  qz.security.setSignatureAlgorithm("SHA512"); // Since 2.1
  qz.security.setSignaturePromise(function (toSign) {
    return function (resolve, reject) {
      try {
        var pk = KEYUTIL.getKey(privateKey);
        var sig = new KJUR.crypto.Signature({ alg: "SHA512withRSA" }); // Use "SHA1withRSA" for QZ Tray 2.0 and older
        sig.init(pk);
        sig.updateString(toSign);
        var hex = sig.sign();
        console.log("DEBUG: \n\n" + stob64(hextorstr(hex)));
        resolve(stob64(hextorstr(hex)));
      } catch (err) {
        console.error(err);
        reject(err);
      }
    };
  });
