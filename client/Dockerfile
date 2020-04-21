FROM node:12-alpine

# install yarn
# RUN npm install -g yarn

# set working directory
WORKDIR /app

# add `/app/node_modules/.bin` to $PATH
# ENV PATH /app/node_modules/.bin:$PATH

# install app dependencies
COPY webpack.config.js ./
COPY package.json ./
COPY yarn.lock ./
RUN yarn

# add app
# COPY . ./

# start app
CMD ["yarn", "start:dev"]
