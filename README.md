# Car Booking

## Setup project
1. git clone
2. cp .env.example .env
   1. Put your values
3. cp docker-compose.yaml.{dev/prod}.template docker-compose.yaml
   1. Change network to network-booking and replace it for all containers,
   example container nood-booking 
4. cp Makefile.example to Makefile
5. Run command `sudo make build_service`
6. Rub command `sudo make start_service`
7. Rub command `sudo make init_app`
8. Connect to node container by following command `sudo docker exec -it node-booking sh`
9. Run command `npm i`
10. Add your local domain into /etc/hosts config
11. Open you project in browser: your-local-domain:port/
12. In .env file put the value for parameter ADMIN_URL PREFIX, that value will be admin prefix url,
    by default it's 'admin', it means you can reach admin panel by url your-local-domain:port/admin/
