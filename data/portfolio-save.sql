-- Table pages
CREATE TABLE IF NOT EXISTS pages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titre VARCHAR(255) NOT NULL,
    id_parent INTEGER,
    order_page_parent INTEGER DEFAULT 0,
    order_page_enfant INTEGER DEFAULT 0,
    FOREIGN KEY (id_parent) REFERENCES pages(id) ON DELETE CASCADE
);

-- Table contenu
CREATE TABLE IF NOT EXISTS contenu (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titre VARCHAR(255) NOT NULL,
    paragraphe TEXT,
    images VARCHAR(255),
    map_url TEXT,
    page_id INTEGER,
    FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE
);

-- Table login (admin)
CREATE TABLE IF NOT EXISTS login (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);
