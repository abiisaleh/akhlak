php spark db:create akhlak
php spark migrate
php spark db:seed Demo
php spark auth:create_user admin admin@demo.com
php spark auth:set_password admin 1234demo
php spark auth:create_user akhlak akhlak@demo.com
php spark auth:set_password akhlak 1234demo
php spark auth:create_group admin "kelola data admin"
php spark auth:create_group pemilik "kelola data pemilik"
