# docker/frontend/Dockerfile
FROM node:18-alpine
RUN npm install -g @angular/cli
WORKDIR /app
EXPOSE 4200
CMD ["ng", "serve", "--host", "0.0.0.0"]