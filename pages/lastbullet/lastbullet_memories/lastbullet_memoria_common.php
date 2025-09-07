<?php

require_once(__DIR__ . '/../../../utils/constants.php');
require_once(__DIR__ . '/../../../utils/db.php');
require_once(__DIR__ . '/../../../utils/utils.php');

class LastbulletMemoriaCommon {
    const KIND = Constants::KIND_LASTBULLET_MEMORIA;

    /**
     * ページタイトル
     */
    const PAGE_TITLE_LIST = self::KIND . Constants::PAGE_LIST;
    const PAGE_TITLE_ADD = self::KIND . Constants::PAGE_ADD;
    const PAGE_TITLE_EDIT = self::KIND . Constants::PAGE_EDIT;
    const PAGE_TITLE_DELETE = self::KIND . Constants::PAGE_DELETE;

    /**
     * 表示名
     */
    const PAGE_ITEM_NAME = '名称';
    const PAGE_ITEM_ATTRIBUTE_TYPE = '属性';

    const HTML_NAME_NAME = 'name';
    const HTML_NAME_ATTRIBUTE_TYPE = 'attribute_type';

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'lastbullet_memoria_list.php';
    const FILE_ADD = 'lastbullet_memoria_add.php';
    const FILE_EDIT = 'lastbullet_memoria_edit.php';
    const FILE_CREATE = 'lastbullet_memoria_create.php';
    const FILE_UPDATE = 'lastbullet_memoria_update.php';
    const FILE_DELETE = 'lastbullet_memoria_delete.php';
    
    /**
     * リンク
     */
    const HREF_LIST = Constants::PATH_CURRENT . self::FILE_LIST;
    const HREF_ADD = Constants::PATH_CURRENT . self::FILE_ADD;
    const HREF_EDIT = Constants::PATH_CURRENT . self::FILE_EDIT;
    const HREF_CREATE = Constants::PATH_CURRENT . self::FILE_CREATE;
    const HREF_UPDATE = Constants::PATH_CURRENT . self::FILE_UPDATE;
    const HREF_DELETE = Constants::PATH_CURRENT . self::FILE_DELETE;

    /**
     * レコード一覧を取得
     * @return object
     */
    public static function list(): array {
        $pdo = get_db();
        $sql = '
            SELECT 
                l.id AS id,
                l.name AS name,
                l.attribute_type AS attribute_type
            FROM
                lastbullet_memories AS l 
            ORDER BY 
                l.name ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                l.id AS id,
                l.name AS name,
                l.attribute_type AS attribute_type
            FROM
                lastbullet_memories AS l 
            WHERE 
                l.id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(string $name, int $attribute_type): void {
        $pdo = get_db();

        $sql = '
            INSERT INTO lastbullet_memories (
                name,
                attribute_type
            ) VALUES (
                :name,
                :attribute_type
            )
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':attribute_type', $attribute_type, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function update(int $id, string $name, int $attribute_type): void {
        $pdo = get_db();

        $sql = '
            UPDATE 
                lastbullet_memories
            SET 
                name = :name,
                attribute_type = :attribute_type
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':attribute_type', $attribute_type, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                lastbullet_memories
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

/**
 * 属性の列挙型
 */
enum LastbulletAttributeType: int {
    use EnumSelectable;

    case Unknown = 0;
    case Fire = 1;
    case Water = 2;
    case Wind = 3;
    case Light = 4;
    case Dark = 5;

    public function label(): string {
        return match($this) {
            LastbulletAttributeType::Unknown => '不明',
            LastbulletAttributeType::Fire => '火',
            LastbulletAttributeType::Water => '水',
            LastbulletAttributeType::Wind => '風',
            LastbulletAttributeType::Light => '光',
            LastbulletAttributeType::Dark => '闇',
        };
    }
}

?>