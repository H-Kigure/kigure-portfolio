FROM httpd:2.4-alpine

COPY ./dist/ /usr/local/apache2/htdocs/

EXPOSE 80

HEALTHCHECK --interval=10s --timeout=3s --start-period=5s --retries=3 \
  CMD wget --quiet --tries=1 --spider http://127.0.0.1/ || exit 1
