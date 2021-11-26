FROM node:16-alpine

WORKDIR /opt/app

# Allow node to bind to port 80
RUN apk update && apk add libcap
RUN setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/node

COPY package.json package-lock.json ./
RUN npm ci --production
COPY . .

ENV PORT=443
EXPOSE 443

VOLUME /opt/app/server-data

CMD ["/usr/local/bin/node", "server/server.js"]