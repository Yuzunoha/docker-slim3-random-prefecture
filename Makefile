init:
	cd server_prefectural_capital; docker-compose build --no-cache;
	cd server_prefectural_capital; docker-compose up -d;
	cd server_random_prefecture; docker-compose build --no-cache;
	cd server_random_prefecture; docker-compose up -d;

up:
	cd server_prefectural_capital; docker-compose up -d;
	cd server_random_prefecture; docker-compose up -d;

ps:
	cd server_prefectural_capital; docker-compose ps;
	cd server_random_prefecture; docker-compose ps;

down:
	cd server_prefectural_capital; docker-compose down;
	cd server_random_prefecture; docker-compose down;
