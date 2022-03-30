# WELCOME TO SISTEM INFORMARI ESEKUTIF UNTUK PENJUALAN KAYU

INI adalah Project untuk para eksekutif khusunya penjualan kayu agar dapat memonitoring penjualan kayu tersebut.

installasi :
1. clone file : $ git clone https://github.com/ipsmerdek4/sie-jaku.git atau download langsung,
2. finish clone silahkan setting .env sesuaikan dengan database anda "untuk projeck ini saya menggunakan database #siejaku"
3. setelah setting dan membuat database silahkan migrasi untuk membuat table dengan cara :
    a. masuk ke composer Command Prompt dan ketikan : php spark migrate
    b. setelah finish masuk ke table dan import file yang ada di folder /public/backup_sql/ "data ini sebagai pelengkap"
4. Finish sistem dapat di gunakan dengan user dan pasword defauld : admin