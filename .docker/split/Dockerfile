FROM splitsoftware/split-synchronizer

COPY . /application

WORKDIR /application

ENTRYPOINT split-sync \
    -apikey ${SPLIT_APPLICATION_ID} \
    -redis-host ${SPLIT_REDIS_HOST} \
    -redis-port ${SPLIT_REDIS_PORT} \
    -redis-db ${SPLIT_REDIS_DATABASE} \
    -redis-pass "${SPLIT_REDIS_PASSWORD}" \
    -config /application/config.json
