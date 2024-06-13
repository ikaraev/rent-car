FROM nginx:1.20

COPY nginx.conf /etc/nginx/
COPY default.conf /etc/nginx/conf.d/
COPY default.conf /etc/nginx/sites-available/

RUN apt-get update \
    && apt-get install --no-install-recommends --no-install-suggests -q -y \
    nginx \
    procps \
    vim
