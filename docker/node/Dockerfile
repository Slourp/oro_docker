# Base stage# --------------------------------------- 
FROM node:18-alpine AS base 
# This get shared across later stages 
WORKDIR /node/app 
RUN chown -R node:node /node 
USER node 

# Development stage 
# --------------------------------------- 
FROM base AS development 

ARG SERVER_PORT=${SERVER_PORT} 
ENV SERVER_PORT=${NODE_ENV} 
ENV NODE_ENV=${NODE_ENV} 
ENV PATH /app/node_modules/.bin:$PATH 
# EXPOSE $SERVER_PORT 

COPY --chown=node:node package*.json ./ 
RUN \ 
    NODE_ENV=development && \
    yarn install --frozen-lockfile

WORKDIR /node/app 

RUN chmod -R 777 /node/app

CMD [ "yarn", "watch", "build"]

# CMD ["sh", "-c", "while true; do sleep 60; done"]