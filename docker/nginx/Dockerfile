FROM nginx:latest

COPY default.conf /etc/nginx/conf.d/

ARG UID=1000
RUN useradd --create-home --uid $UID user
USER user